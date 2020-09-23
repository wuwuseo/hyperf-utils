<?php


declare(strict_types=1);

namespace Cmf\Model;
use Hyperf\DbConnection\Model\Model as BaseModel;

abstract class Model extends BaseModel
{
    const DELETED_AT = 'delete_time';

    const CREATED_AT = 'create_time';

    const UPDATED_AT = 'update_time';
}