<?php


interface Phone
{
    public function setCalling(string $numbers): string;

    public function setUrls(string $urls): string;
}