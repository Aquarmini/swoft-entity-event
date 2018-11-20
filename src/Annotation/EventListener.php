<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoftx\EntityEvent\Annotation;

/**
 * @Annotation
 * @Target("CLASS")
 */
class EventListener
{
    /**
     * 监听实体名
     * @var string
     */
    protected $name;

    /**
     * 事件排序值
     * @var integer
     */
    protected $sort = 0;

    /**
     * Cacheable constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        if (isset($values['value'])) {
            $this->name = $values['value'];
        }
        if (isset($values['name'])) {
            $this->name = $values['name'];
        }
        if (isset($values['sort'])) {
            $this->sort = $values['sort'];
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSort(): int
    {
        return $this->sort;
    }
}
