<?php

namespace DreamCommunity\WebsiteBundle\Twig;

class SubStringExtension extends \Twig_Extension
{

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            'substring' => new \Twig_Filter_Method($this, 'subStringFilter'),
        );
    }

    /**
     * @param $text
     * @param $lookfor
     * @return string
     */
    public function subStringFilter($text, $lookfor)
    {
        $indexof = strpos($text, $lookfor);
        return substr($text,0,$indexof);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'substring_extension';
    }
}