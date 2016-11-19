<?php

namespace IvoPetkov\VideoEmbed\Internal;


class EmbedResponse {

    /**
     * @var string
     */
    protected $html;

    /**
     * @var int
     */
    protected $width;
    /**
     * @var int
     */
    protected $height;
    /**
     * @var int
     */
    protected $duration;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $description;
    /**
     * @var string
     */
    protected $thumbnail_url;
    /**
     * @var int
     */
    protected $thumbnail_width;
    /**
     * @var int
     */
    protected $thumbnail_height;
    /**
     * @var string
     */
    protected $author_name;
    /**
     * @var string
     */
    protected $author_url;
    /**
     * @var string
     */
    protected $provider_name;
    /**
     * @var string
     */
    protected $provider_url;
    /**
     * @var
     */
    protected $raw_response;

    /**
     * @return mixed
     */
    public function getHtml() {
        return $this->html;
    }

    /**
     * @param mixed $html
     *
     * @return EmbedResponse
     */
    public function setHtml( $html ) {
        $this->html = $html;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * @param mixed $width
     *
     * @return EmbedResponse
     */
    public function setWidth( $width ) {
        $this->width = $width;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * @param mixed $height
     *
     * @return EmbedResponse
     */
    public function setHeight( $height ) {
        $this->height = $height;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     *
     * @return EmbedResponse
     */
    public function setDuration( $duration ) {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return EmbedResponse
     */
    public function setTitle( $title ) {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return EmbedResponse
     */
    public function setDescription( $description ) {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnailUrl() {
        return $this->thumbnail_url;
    }

    /**
     * @param mixed $thumbnail_url
     *
     * @return EmbedResponse
     */
    public function setThumbnailUrl( $thumbnail_url ) {
        $this->thumbnail_url = $thumbnail_url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnailWidth() {
        return $this->thumbnail_width;
    }

    /**
     * @param mixed $thumbnail_width
     *
     * @return EmbedResponse
     */
    public function setThumbnailWidth( $thumbnail_width ) {
        $this->thumbnail_width = $thumbnail_width;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnailHeight() {
        return $this->thumbnail_height;
    }

    /**
     * @param mixed $thumbnail_height
     *
     * @return EmbedResponse
     */
    public function setThumbnailHeight( $thumbnail_height ) {
        $this->thumbnail_height = $thumbnail_height;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorName() {
        return $this->author_name;
    }

    /**
     * @param mixed $author_name
     *
     * @return EmbedResponse
     */
    public function setAuthorName( $author_name ) {
        $this->author_name = $author_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorUrl() {
        return $this->author_url;
    }

    /**
     * @param mixed $author_url
     *
     * @return EmbedResponse
     */
    public function setAuthorUrl( $author_url ) {
        $this->author_url = $author_url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProviderName() {
        return $this->provider_name;
    }

    /**
     * @param mixed $provider_name
     *
     * @return EmbedResponse
     */
    public function setProviderName( $provider_name ) {
        $this->provider_name = $provider_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProviderUrl() {
        return $this->provider_url;
    }

    /**
     * @param mixed $provider_url
     *
     * @return EmbedResponse
     */
    public function setProviderUrl( $provider_url ) {
        $this->provider_url = $provider_url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRawResponse() {
        return $this->raw_response;
    }

    /**
     * @param mixed $raw_response
     *
     * @return EmbedResponse
     */
    public function setRawResponse( $raw_response ) {
        $this->raw_response = $raw_response;

        return $this;
    }


}