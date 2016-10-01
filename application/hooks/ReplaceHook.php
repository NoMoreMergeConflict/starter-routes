<?php

/**
 * Use to find all four letter words in quote and replace with asterisks.
 * @author Alex Zhang
 */
class ReplaceHook{
    /**
     * This is the main function of the hook. It grabs the context in <p> element
     * with class "lead" before displayed in a browser and modifies it.
     */
    function replace_words(){
        //References the CI superobject to have access to the webpage.
        $this->CI =& get_instance();
        $page = $this->CI->output->get_output();
        
        //Finds a <p> tag that has the class 'lead' and gets the tags contents.
        preg_match_all('/<p[^>]*class="lead"[^>]*>([^>]*)<\s*\/\s*p\s*>/', $page, $string);

        //getting the subarray from $string
        $shortString = $string[0]; 

        //loops through all matches(four letter words) and replace with asterisks.
        foreach ($shortString as &$match)
        {
            $match = preg_replace("/\b([a-zA-Z]{4})\b/", "****", $match);
        }

        //ensures that the variable is not undefined
        $shortString = $shortString + array(null);
     
        //replaceds the old section with the modified section of code
        $page = preg_replace('/<p[^>]*class="lead"[^>]*>([^>]*)<\s*\/\s*p\s*>/', $shortString[0], $page);

        //send the page onward to be displayed
        $this->CI->output->set_output($page);
        $this->CI->output->_display();
    }
}