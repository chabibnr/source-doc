<?php
/**
 * Created by PhpStorm.
 * User: Butterfly
 * Date: 10/25/2017
 * Time: 12:49 PM
 */

namespace chabibnr\docblock;


class Document
{
    /**
     * @param \phpDocumentor\Reflection\DocBlock\Tags\Author[] $authors
     */
    public static function getAuthors($authors)
    {
        $allAuthors = [];
        foreach ($authors as $author) {
            $allAuthors[] = [
                'name' => $author->getAuthorName(),
                'email' => $author->getEmail()
            ];
        }

        return $allAuthors;
    }

    public static function getSince($since)
    {
        /** @var \phpDocumentor\Reflection\DocBlock\Tags\Since $getSince */
        $getSince = isset($since[0]) ? $since[0] : false;
        return $getSince != false ? $getSince->getVersion() : '-';
    }

    public static function getVersion($version)
    {
        /** @var \phpDocumentor\Reflection\DocBlock\Tags\Version $getVersion */
        $getVersion = isset($version[0]) ? $version[0] : false;
        return $getVersion != false ? $getVersion->getVersion() : '-';
    }

    public static function getTypes($types)
    {

    }

    public static function tags($document){

        return [
            'summary' => $document->getSummary(),
            'description' => \Michelf\Markdown::defaultTransform($document->getDescription()->render()),
            'author' => Document::getAuthors($document->getTagsByName('author')),
            'since' => Document::getSince($document->getTagsByName('since')),
            'version' => Document::getVersion($document->getTagsByName('version')),
            'type' => $document->getTagsByName('return'),
        ];
    }
}