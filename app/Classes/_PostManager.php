<?php

namespace App\Classes;

/**
 * Classe responsável por controlar a criação e alteração de posts
 *
 * @package     app
 * @subpackage  Classes
 * @name        Connection
 * @author      Ryan Maia
 *
 */
class PostManager
{
    private function createLastPostIndex($index)
    {
        if(!file_exists(__DIR__ . "/../views/posts/lastPost.txt"))
        {
            $lastPost = fopen(__DIR__ . "/../views/posts/lastPost.txt", "w");
            fwrite($lastPost,$index);
            fclose($lastPost);
        }
    }
    public function getLastPostIndex()
    {
        if(file_exists(__DIR__ . "/../views/posts/lastPost.txt"))
        {
            $lastPost = fopen(__DIR__ . "/../views/posts/lastPost.txt", "r");
            $lastPostIndex = fgets($lastPost);
            fclose($lastPost);
            return $lastPostIndex;
        }
        else
        {
            $this->createLastPostIndex($this->mapLastPostIndex());
            return $this->getLastPostIndex();
        }
    }
    public function incrementLastPostIndex()
    {
        if(file_exists(__DIR__ . "/../views/posts/lastPost.txt"))
        {
            $lastPostIndex = $this->getLastPostIndex();

            $lastPostIndex += 1;

            $lastPost = fopen(__DIR__ . "/../views/posts/lastPost.txt", "w");
            fwrite($lastPost,$lastPostIndex);
            fclose($lastPost);
        }
    }
    private function mapLastPostIndex()
    {
        $postFiles = array_diff(scandir(__DIR__ . "/../views/posts"), array('.', '..')); 
        $postFiles = array_filter($postFiles,function ($line)
        {
            if(substr($line,-4) == ".php" && substr($line,0,4) == "post")
            {
                return $line;
            }
        });

        $postFilesIndexs = array_map(function($line){
            $line = str_replace("post-","",$line);
            $line = str_replace(".php","",$line);
            return $line;
        },$postFiles);

        $postFilesIndexs = array_values($postFilesIndexs);
        rsort($postFilesIndexs);
        $lastPostIndex = $postFilesIndexs[0];

        return $lastPostIndex;
    }
    public function createPost($content){
        $lastPostIndex = $this->getLastPostIndex();
        $newPostIndex = $lastPostIndex + 1;

        $this->incrementLastPostIndex();

        $fileName = "post-" . $newPostIndex . ".php";

        $newPostFile = fopen(__DIR__ . "/../views/posts/" . $fileName, "w");
        fwrite($newPostFile,$content);
        fclose($newPostFile);

        return $newPostIndex;
    }
    public function addPostName($postId,$name){
        $data = file_get_contents(__DIR__ . "/../views/posts/postNames.json");
        $jsonNames = json_decode($data, true);
        $postId = "post-$postId.php";
        $jsonNames[$postId] = $name;
        
        $postNamesFile = fopen(__DIR__ . "/../views/posts/postNames.json", "w");
        fwrite($postNamesFile,json_encode($jsonNames));
        fclose($postNamesFile);
    }
}