<?php

namespace DreamCommunity\WebsiteBundle\TextHelper;

class DcAutoLinkText
{
    /**
     * Remplace les liens dans le texte par
     * un véritable lien cliquable
     *
     * @param string $text
     */
    public function auto_link_text($text)
    {
        $pattern  = '#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#';
        $textReturn = preg_replace($pattern, '<a href="$1" target="_blank">$1</a>', $text);

        return $textReturn;
    }
}