<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Header extends OW_Object {

     const UPPER = '_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     const LOWER = '-abcdefghijklmnopqrstuvwxyz';

    protected $headers = [];
    protected $cacheControl = [];

    public function __construct(array $headers = [])
    {
        foreach ($headers as $key => $values) {
            $this->set($key, $values);
        }
    }

    /**
     * Returns the headers as a string.
     *
     * @return string The headers
     */
    public function __toString()
    {
        if (!$headers = $this->all()) {
            return '';
        }

        ksort($headers);
        $max = max(array_map('strlen', array_keys($headers))) + 1;
        $content = '';
        foreach ($headers as $name => $values) {
            $name = ucwords($name, '-');
            foreach ($values as $value) {
                $content .= sprintf("%-{$max}s %s\r\n", $name.':', $value);
            }
        }

        return $content;
    }

    /**
     * Returns the headers.
     *
     * @param null $key
     * @return array|mixed
     */
    public function all($key = null)
    {
        if (null !== $key) {
            return $this->headers[strtr($key, self::UPPER, self::LOWER)] ?? [];
        }

        return $this->headers;
    }

    /**
     * Returns the parameter keys.
     *
     * @return array An array of parameter keys
     */
    public function keys()
    {
        return array_keys($this->all());
    }

    /**
     * Replaces the current HTTP headers by a new set.
     *
     * @param array $headers
     */
    public function replace(array $headers = [])
    {
        $this->headers = [];
        $this->add($headers);
    }

    /**
     * Adds new headers the current HTTP headers set.
     *
     * @param array $headers
     */
    public function add(array $headers)
    {
        foreach ($headers as $key => $values) {
            $this->set($key, $values);
        }
    }

    /**
     * Returns a header value by name.
     *
     * @param $key
     * @param null $default
     * @return string|null
     */
    public function get($key, $default = null)
    {
        $headers = $this->all($key);

        if (!$headers) {
            return $default;
        }

        if (null === $headers[0]) {
            return null;
        }

        return (string) $headers[0];
    }

    /**
     * Sets a header by name.
     *
     * $values  The value or an array of values
     * $replace Whether to replace the actual value or not (true by default)
     *
     * @param $key
     * @param $values
     * @param bool $replace
     */
    public function set( $key, $values, $replace = true)
    {
        $key = strtr($key, self::UPPER, self::LOWER);

        if (\is_array($values)) {
            $values = array_values($values);

            if (true === $replace || !isset($this->headers[$key])) {
                $this->headers[$key] = $values;
            } else {
                $this->headers[$key] = array_merge($this->headers[$key], $values);
            }
        } else {
            if (true === $replace || !isset($this->headers[$key])) {
                $this->headers[$key] = [$values];
            } else {
                $this->headers[$key][] = $values;
            }
        }
    }

    /**
     * Returns true if the HTTP header is defined.
     *
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return \array_key_exists(strtr($key, self::UPPER, self::LOWER), $this->all());
    }

    /**
     * Returns true if the given HTTP header contains the given value.
     *
     * @param $key
     * @param $value
     * @return bool
     */
    public function contains($key, $value)
    {
        return \in_array($value, $this->all($key));
    }

    /**
     * Removes a header.
     *
     * @param $key
     */
    public function remove($key)
    {
        $key = strtr($key, self::UPPER, self::LOWER);

        unset($this->headers[$key]);

        if ('cache-control' === $key) {
            $this->cacheControl = [];
        }
    }

    /**
     * Returns the HTTP header value converted to a date.
     *
     * @param $key
     * @param DateTime|null $default
     * @return DateTime|false
     */
    public function getDate($key, \DateTime $default = null)
    {
        if (null === $value = $this->get($key)) {
            return $default;
        }

        if (false === $date = \DateTime::createFromFormat(\DATE_RFC2822, $value)) {
            throw new \RuntimeException(sprintf('The "%s" HTTP header is not parseable (%s).', $key, $value));
        }

        return $date;
    }

    /**
     * Returns the number of headers.
     *
     * @return int The number of headers
     */
    public function count()
    {
        return sizeof($this->headers);
    }

}