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
    protected $thumbnailUrl;
    /**
     * @var int
     */
    protected $thumbnailWidth;
    /**
     * @var int
     */
    protected $thumbnailHeight;
    /**
     * @var string
     */
    protected $authorName;
    /**
     * @var string
     */
    protected $authorUrl;
    /**
     * @var string
     */
    protected $providerName;
    /**
     * @var string
     */
    protected $providerUrl;
    /**
     * @var
     */
    protected $rawResponse;

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
        return $this->thumbnailUrl;
    }

    /**
     * @param mixed $thumbnailUrl
     *
     * @return EmbedResponse
     */
    public function setThumbnailUrl( $thumbnailUrl ) {
        $this->thumbnailUrl = $thumbnailUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnailWidth() {
        return $this->thumbnailWidth;
    }

    /**
     * @param mixed $thumbnailWidth
     *
     * @return EmbedResponse
     */
    public function setThumbnailWidth( $thumbnailWidth ) {
        $this->thumbnailWidth = $thumbnailWidth;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnailHeight() {
        return $this->thumbnailHeight;
    }

    /**
     * @param mixed $thumbnailHeight
     *
     * @return EmbedResponse
     */
    public function setThumbnailHeight( $thumbnailHeight ) {
        $this->thumbnailHeight = $thumbnailHeight;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorName() {
        return $this->authorName;
    }

    /**
     * @param mixed $authorName
     *
     * @return EmbedResponse
     */
    public function setAuthorName( $authorName ) {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorUrl() {
        return $this->authorUrl;
    }

    /**
     * @param mixed $authorUrl
     *
     * @return EmbedResponse
     */
    public function setAuthorUrl( $authorUrl ) {
        $this->authorUrl = $authorUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProviderName() {
        return $this->providerName;
    }

    /**
     * @param mixed $providerName
     *
     * @return EmbedResponse
     */
    public function setProviderName( $providerName ) {
        $this->providerName = $providerName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProviderUrl() {
        return $this->providerUrl;
    }

    /**
     * @param mixed $providerUrl
     *
     * @return EmbedResponse
     */
    public function setProviderUrl( $providerUrl ) {
        $this->providerUrl = $providerUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRawResponse() {
        return $this->rawResponse;
    }

    /**
     * @param mixed $rawResponse
     *
     * @return EmbedResponse
     */
    public function setRawResponse( $rawResponse ) {
        $this->rawResponse = $rawResponse;

        return $this;
    }


}