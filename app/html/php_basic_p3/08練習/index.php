<?php
/**
 * 練習
 */

class MyFileWriter
{
    private $filename;
    private $content = '';
    public const APPEND = FILE_APPEND;

    function __construct($filename)
    {
        $this->filename = $filename;
    }

    function append($content)
    {
        $this->content .= $content;
        return $this;
    }

    function newline()
    {
        return $this->append(PHP_EOL);
    }

    function commit($flag = null)
    {
        file_put_contents($this->filename, $this->content, $flag);
        $this->content = '';
        return $this;
    }
}

$file = new MyFileWriter('sample.txt');
$file->append('Hello, Bob.')
    ->newline()
    ->append("こんにちは")
    ->append("yahoo")
    ->newline()
    ->commit()
    ->append("終了")
    ->commit(MyFileWriter::APPEND);