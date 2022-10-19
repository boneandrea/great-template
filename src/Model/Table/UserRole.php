<?php

declare(strict_types=1);

namespace App\Model\Table;

enum UserRole: string
{
	case USER = 'user';
	case ADMIN = 'admin';
	case SUPERUSER = 'superuser';

	public function names()
	{
		return array_map(fn ($e) => $e->name, self::cases());
	}

	public function values()
	{
		return array_map(fn ($e) => $e->value, self::cases());
	}
}
