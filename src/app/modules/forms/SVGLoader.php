<?php
namespace app\modules\forms;

use app;
use gui;
use std;
use php\xml\XmlProcessor;

class SVGLoader 
{
    /**
     * Parsing SVG-file and convert to lite-path 
     * 
     * @param string Path to SVG-file 
     */
    function parse(string $file)
    {
        $xmlp = new XmlProcessor;
        $xml = $xmlp->parse( Stream::of($file) );
        
        var_dump($xml);
    }

    /**
     *  Apply SVG-image to UXCanvas object
     *  
     *  @param php\gui\UXCanvas canvas
     *  @param string SVG-path
     */
    function load(php\gui\UXCanvas $canvas, string $path, string $color = 'black')
    {
        $gc = $canvas->gc();
        
        $gc->fillColor = $color;
        $gc->appendSVGPath($path);
        $gc->fill();
        
        $gc->closePath();
    }
    
    /**
     * Getting all children on form
     * 
     * @param php\gui\UXForm form
     */
    function getChildren(php\gui\UXForm $obj, array $children = []){
        foreach ($obj->children as $child){
            if( $child->children )
                $children = $this->allChildren($child, $children);
            else
                $children[] = $child;
        }    
        
        return $children;
    }
    
    /**
     * Apply all SVGs to canvas in form
     * 
     * @param php\gui\UXForm form
     */
    function eachForm(php\gui\UXForm $form){
        //$theme = $this->mainModule->config->darkTheme ? "dark" : "light";
        
        foreach( $this->allChildren($form) as $child){
            if( $child instanceof php\gui\UXCanvas ){
                $r = Regex::of("svg\\_theme\\_(.*)")->with($child->id);
                
                if( $r->find() )
                    $this->load( $child, $this->parse( "res://.data/img/{$theme}/". $r->group(1) .".svg" ) );
                    
            }
        }
    }
}