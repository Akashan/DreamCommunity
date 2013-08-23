<?php

namespace DreamCommunity\WebsiteBundle\Twig;

class IndexOfExtension extends \Twig_Extension
{

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            'indexof' => new \Twig_Filter_Method($this, 'indexofFilter'),
        );
    }

    /**
     * @param $text Complete string
     * @param $lookfor Sub string to find in $text
     * @return integer Index of the first position of $lookfor
     */
    public function indexofFilter($text, $lookfor)
    {
        $indexof = strpos($text, $lookfor);

        return $indexof;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'indexof_extension';
    }
}