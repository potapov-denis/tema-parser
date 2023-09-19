<?php

declare(strict_types=1);

namespace App\Parser\Loaders\Exceptions;

use Exception;
use Throwable;

final class GetRemoteFileException extends Exception
{
	public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}