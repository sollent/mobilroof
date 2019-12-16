<?php

namespace App\DTO\Mobilroof;

/**
 * Class OrderDTO
 * @package App\DTO\Mobilroof
 */
class OrderDTO
{
    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $fileType;

    /**
     * @var string
     */
    private $pageTitle;

    /**
     * @return string
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile(string $file): void
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getPageTitle(): ?string
    {
        return $this->pageTitle;
    }

    /**
     * @param string $pageTitle
     */
    public function setPageTitle(string $pageTitle): void
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * @return string
     */
    public function getFileType(): ?string
    {
        return $this->fileType;
    }

    /**
     * @param string $fileType
     */
    public function setFileType(string $fileType): void
    {
        $this->fileType = $fileType;
    }
}
