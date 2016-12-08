

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

            $cssDirection	=	 dirname(dirname(__FILE__)) . '/css/';
            			$filesArray	=	$this->findFiles($cssDirection, 'css');


            			$cssLinks	=	$this->createCssLink($filesArray);

            			include 'html/'. $this->header;
        }

    public function buildBody()
    		{
    			include 'html/'. $this->body;
    		}

    		public function buildFooter()
    		{
    			// Get JS-files
    			$jsDir	=	 dirname(dirname(__FILE__)) . '/js/';
    			$filesArray	=	$this->findFiles($jsDir, 'js');

    			$jsScripts	=	$this->createJsScripts($filesArray);

    			include 'html/'. $this->footer;
    		}

    		public function buildPage()
    		{
    			$this->buildHeader();
    			$this->buildBody();
    			$this->buildFooter();
    		}

    		public function findFiles($dir, $file)
    		{

    			return glob($dir . '/*.' . $file);
    		}

    		public function createCssLink($filesArray)
    		{
    			$dumpArray	=	array();

    			foreach ($filesArray as $file)
    			{
    				$fileInfo	=	pathinfo($file);
    				$fileName	=	$fileInfo['basename'];

    				$dumpArray[] = '<link rel="stylesheet" type="text/css" href="css/' . $fileName . '">';
    			}

    			return implode('', $dumpArray);
    		}

    		public function createJsScripts($filesArray)
    		{
    			$dumpArray	=	array();

    			foreach ($filesArray as $file)
    			{
    				$fileInfo	=	pathinfo($file);
    				$fileName	=	$fileInfo['basename'];

    				$dumpArray[] = '<script src="js/' . $fileName . '"></script>';
    			}

    			return implode('', $dumpArray);
    		}
    	}