<?php
class book
{
    private $title;
    private $author;
    private $editor;
    private $nb_pages;

    public function __construct($title, $author, $editor, $nb_pages)
    {
        $this->title = $title;
        $this->author = $author;
        $this->editor = $editor;
        $this->nb_pages = $nb_pages;
    }

    public function get_title()
    {
        return $this->title;
    }

    public function set_title($title)
    {
        $this->title = $title;
    }

    public function get_author()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function set_author($author)
    {
        $this->author = $author;
    }

    public function get_editor()
    {
        return $this->editor;
    }

    public function set_editor($editor)
    {
        $this->editor = $editor;
    }

    public function get_nb_pages()
    {
        return $this->nb_pages;
    }

    public function set_nb_pages($nb_pages)
    {
        $this->nb_pages = $nb_pages;
    }

    public function to_string()
    {
        return 'Book={title=\'' . $this->title . '\', author=\'' . $this->author
            . '\', editor=\'' . $this->editor . '\', nbPages=' . $this->nb_pages . '}';
    }
}