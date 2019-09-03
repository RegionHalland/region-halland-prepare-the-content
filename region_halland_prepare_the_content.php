<?php

    /**
     * @package Region Halland Prepare The Content
     */
    /*
    Plugin Name: Region Halland Prepare The Content
    Description: Lägger till ett ID med slut i alla rubriker (h2, h3 och h4)
    Version: 1.2.1
    Author: Roland Hydén
    License: MIT
    Text Domain: regionhalland
    */

    // Lägger till id med slut till alla rubriker och returnerar detta till wordpress
    function get_region_halland_prepare_the_content() {
        
        // Wordpress-filter för att manipulera "the_content"
        add_filter('the_content', function($content) {
           return region_halland_prepare_the_content_add_id_to_headings($content);
        });

    }

    function region_halland_prepare_the_content_add_id_to_headings($content) {

        // Hämta aktuell post
        global $post;

        // Lägg innehållet i "the_content" i en variabel
        $pageContent = $post->post_content;
        
        // Splitta upp the_content på "radbryt"
        $content = "";
        $arrPageContents = explode(PHP_EOL, $pageContent);
        
        // Löpnummer för ID
        $countX = 1;
        
        // Loopa igenom arrayen och ersätt respektive rubrik med id och slug
        foreach ($arrPageContents as $arrPageContent) {
            $checkPageContent = substr($arrPageContent,1,2);
            switch ($checkPageContent) {
                case 'h2':
                    $tmpContentH2 = str_replace("<h2>","",$arrPageContent);
                    $tmpContentH2 = str_replace("</h2>","",$tmpContentH2);
                    $toSlugH2 = region_halland_prepare_the_content_prepare_slug($tmpContentH2);
                    $toSlugH2WIthNumber = $toSlugH2 . "-" . $countX; 
                    $withIDH2 = str_replace("h2>","h2 id='".$toSlugH2WIthNumber."'>",$arrPageContent);
                    $content .= $withIDH2;
                    $countX++;
                    break;
                case 'h3':
                    $tmpContentH3 = str_replace("<h3>","",$arrPageContent);
                    $tmpContentH3 = str_replace("</h3>","",$tmpContentH3);
                    $toSlugH3 = region_halland_prepare_the_content_prepare_slug($tmpContentH3);
                    $toSlugH3WIthNumber = $toSlugH3 . "-" . $countX; 
                    $withIDH3 = str_replace("h3>","h3 id='".$toSlugH3WIthNumber."'>",$arrPageContent);
                    $content .= $withIDH3;
                    $countX++;
                    break;
                case 'h4':
                    $tmpContentH4 = str_replace("<h4>","",$arrPageContent);
                    $tmpContentH4 = str_replace("</h4>","",$tmpContentH4);
                    $toSlugH4 = region_halland_prepare_the_content_prepare_slug($tmpContentH4);
                    $toSlugH4WithNumber = $toSlugH4 . "-" . $countX; 
                    $withIDH4 = str_replace("h4>","h4 id='".$toSlugH4WithNumber."'>",$arrPageContent);
                    $content .= $withIDH4;
                    $countX++;
                    break;
                default:
                    $content       .= "<p>" . $arrPageContent . "</p>";
            }
        }

        // Returnera preparerad "the_content"
        return $content;

    }

    // Funktion för att rensa bort eventuella specialtecken som inte får finnas i en slug
    function region_halland_prepare_the_content_prepare_slug($content) {

        $tmpSlug = str_replace(" ","-",$content);
        $tmpSlug = str_replace("(","",$tmpSlug);
        $tmpSlug = str_replace(")","",$tmpSlug);
        $tmpSlug = str_replace("?","",$tmpSlug);
        $tmpSlug = str_replace("!","",$tmpSlug);
        $tmpSlug = str_replace("Ö","o",$tmpSlug);
        $tmpSlug = str_replace("ö","o",$tmpSlug);
        $tmpSlug = str_replace("Ä","a",$tmpSlug);
        $tmpSlug = str_replace("ä","a",$tmpSlug);
        $tmpSlug = str_replace("Å","a",$tmpSlug);
        $tmpSlug = str_replace("å","a",$tmpSlug);
        $tmpSlug = trim($tmpSlug);
        $tmpSlug = strtolower($tmpSlug);

        // Returnera rensad slug
        return $tmpSlug;
                    
    }

    // Metod som anropas när pluginen aktiveras
    function region_halland_prepare_the_content_activate() {
        // Ingenting just nu...
    }

    // Metod som anropas när pluginen avaktiveras
    function region_halland_prepare_the_content_deactivate() {
        // Ingenting just nu...
    }
    
    // Vilken metod som ska anropas när pluginen aktiveras
    register_activation_hook( __FILE__, 'region_halland_prepare_the_content_activate');

    // Vilken metod som ska anropas när pluginen avaktiveras
    register_deactivation_hook( __FILE__, 'region_halland_prepare_the_content_deactivate');

?>