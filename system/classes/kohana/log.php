<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Message logging with observer-based log writing.
 *
 * [!!] This class does not support extensions, only additional writers.
 *
 * @package    Kohana
 * @category   Logging
 * @author     Kohana Team
 * @copyright  (c) 2008-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Kohana_Log {

    // Log message levels - Windows users see PHP Bug #18090
    const EMERGENCY = LOG_EMERG;    // 0
    const ALERT     = LOG_ALERT;    // 1
    const CRITICAL  = LOG_CRIT;     // 2
    const ERROR     = LOG_ERR;      // 3
    const WARNING   = LOG_WARNING;  // 4
    const NOTICE    = LOG_NOTICE;   // 5
    const INFO      = LOG_INFO;     // 6
    const DEBUG     = LOG_DEBUG;    // 7
    const STRACE    = 8;

    /**
     * @var  string  timestamp format for log entries
     */
    public static $timestamp = 'Y-m-d H:i:s';

    /**
     * @var  string  timezone for log entries
     */
    public static $timezone;

    /**
     * @var  boolean  immediately write when logs are added
     */
    public static $write_on_add = FALSE;

    /**
     * @var  Log  Singleton instance container
     */
    protected static $_instance;

    /**
     * Get the singleton instance of this class and enable writing at shutdown.
     *
     *     $log = Log::instance();
     *
     * @return  Log
     */
    public static function instance()
    {
        if (Log::$_instance === NULL)
        {
            // Create a new instance
            Log::$_instance = new Log;

            // Write the logs at shutdown
            register_shutdown_function(array(Log::$_instance, 'write'));
        }

        return Log::$_instance;
    }

    /**
     * @var  array  list of added messages
     */
    protected $_messages = array();

    /**
     * @var  array  list of log writers
     */
    protected $_writers = array();

    /**
     * Attaches a log writer, and optionally limits the levels of messages that
     * will be written by the writer.
     *
     *     $log->attach($writer);
     *
     * @param   object   Log_Writer instance
     * @param   mixed    array of messages levels to write OR max level to write
     * @param   integer  min level to write IF $levels is not an array
     * @return  Log
     */
    public function attach(Log_Writer $writer, $levels = array(), $min_level = 0)
    {
        if ( ! is_array($levels))
        {
            $levels = range($min_level, $levels);
        }
        
        $this->_writers["{$writer}"] = array
        (
            'object' => $writer,
            'levels' => $levels
        );

        return $this;
    }

    /**
     * Detaches a log writer. The same writer object must be used.
     *
     *     $log->detach($writer);
     *
     * @param   object  Log_Writer instance
     * @return  Log
     */
    public function detach(Log_Writer $writer)
    {
        // Remove the writer
        unset($this->_writers["{$writer}"]);

        return $this;
    }

    /**
     * Adds a message to the log. Replacement values must be passed in to be
     * replaced using [strtr](http://php.net/strtr).
     *
     *     $log->add(Log::ERROR, 'Could not locate user: :user', array(
     *         ':user' => $username,
     *     ));
     *
     * @param   string  level of message
     * @param   string  message body
     * @param   array   values to replace in the message
     * @return  Log
     */
    public function add($level, $message, array $values = NULL)
    {
        if ($values)
        {
            // Insert the values into the message
            $message = strtr($message, $values);
        }

        // Create a new message and timestamp it
        $this->_messages[] = array
        (
            'time'  => Date::formatted_time('now', Log::$timestamp, Log::$timezone),
            'level' => $level,
            'body'  => $message,
        );

        if (Log::$write_on_add)
        {
            // Write logs as they are added
            $this->write();
        }

        return $this;
    }

    /**
     * Write and clear all of the messages.
     *
     *     $log->write();
     *
     * @return  void
     */
    public function write()
    {
        if (empty($this->_messages))
        {
            // There is nothing to write, move along
            return;
        }

        // Import all messages locally
        $messages = $this->_messages;

        // Reset the messages array
        $this->_messages = array();

        foreach ($this->_writers as $writer)
        {
            if (empty($writer['levels']))
            {
                // Write all of the messages
                $writer['object']->write($messages);
            }
            else
            {
                // Filtered messages
                $filtered = array();

                foreach ($messages as $message)
                {
                    if (in_array($message['level'], $writer['levels']))
                    {
                        // Writer accepts this kind of message
                        $filtered[] = $message;
                    }
                }

                // Write the filtered messages
                $writer['object']->write($filtered);
            }
        }
    }

} // End Kohana_Log
