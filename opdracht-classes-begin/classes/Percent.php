<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 22-11-2016
 * Time: 14:55
 */
class Percent
{




    public $absolute ;
    public $relative;
    public $hundred ;
    public $nominal;

    public function __construct($unit,$new)
    {
        $this->absolute = $this->formatNumber($new / $unit);
        $this->relative=$this->formatNumber( $this->absolute -1 );
        $this->hundred 	= 	$this->formatNumber( $this->relative * 100 );
        $this->nominal=	"status-quo";
        if($this->absolute<0){
            $this->nominal=	"negative";
        }
        elseif ($this->absolute>0){
            $this->nominal=	"positive";
        }

    }

    public function formatNumber($number){
        return number_format($number, 2, '.', ' ');
    }
}