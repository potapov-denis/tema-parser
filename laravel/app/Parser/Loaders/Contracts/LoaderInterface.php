<?php

namespace App\Parser\Loaders\Contracts;

interface LoaderInterface
{
	public function get();
	public function parse();
}