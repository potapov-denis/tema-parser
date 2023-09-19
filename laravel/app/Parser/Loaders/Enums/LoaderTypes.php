<?php


declare(strict_types=1);

namespace App\Parser\Loaders\Enums;

enum LoaderTypes: string
{
	case XML = 'xml';

	public static function getEnum()
	{
		return static::class;
	}
}
