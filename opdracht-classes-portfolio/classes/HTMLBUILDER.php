

<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 24-11-2016
 * Time: 12:49
 */
class HTMLBUILDER
{

protected  $header;
    protected $body;
    protected $footer;

    /**
     * HTMLBUILDER constructor.
     * @param $header
     * @param $body
     * @param $footer
     */
    public function __construct($header, $body, $footer)
    {
        $this->header = $header;
        $this->body = $body;
        $this->footer = $footer;
    }

    /**
     * @param mixed $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @param mixed $footer
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    public function buildHeader()
   		{


        }

}