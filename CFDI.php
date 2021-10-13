<?php

include_once './Classes/XML.php';
include_once './Classes/Comprobante.php';
include_once './Classes/Emisor.php';

class CFDI
{
    protected $comprobante;
    protected $xml;

    function __construct($array_data,$array_rules)
    {

        $this->comprobante = new Comprobante();
        $this->emisor = new Emisor();
        //Obtener el XML por medio de la clase XML
        foreach ($array_data as $key => $value) :
            if ($key != (string) 'Comprobante') :
                foreach ($value as $attribute => $value) :
                //Setear attributos
                // utilizo el metodo setAtribute()
                $this->emisor->setAtribute($attribute, $value);
                endforeach;
            elseif ($key != (string) 'Emisor'):
                foreach ($value as $attribute => $value) :
                    //Setear attributos
                    // utilizo el metodo setAtribute()
                    $this->comprobante->setAtribute($attribute, $value);
                endforeach;
            endif;
        endforeach;

        foreach ($array_rules as $key => $value) :
            if ($key != (string) 'Comprobante') :
                foreach ($value as $attribute => $value) :
                //Setear attributos
                // utilizo el metodo setAtribute()
                $this->emisor->setRules($attribute, $value);
                endforeach;
            elseif ($key != (string) 'Emisor'):
                foreach ($value as $attribute => $value) :
                    //Setear attributos
                    // utilizo el metodo setAtribute()
                    $this->comprobante->setRules($attribute, $value);
                endforeach;
            endif;
        endforeach;


    }


    public function getNode()
    {
      
   
       // $this->xml .= $this->emisor->getNode();
       $this->comprobante->getAtributes();
       echo '</br>';
       $this->emisor->getNode(); 
        
        die();
        return $this->xml;
    }
}