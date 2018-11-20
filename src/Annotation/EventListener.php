<?php
/**
 * Swoft Entity Cache
 *
 * @author   limx <limingxin@swoft.org>
 * @link     https://github.com/limingxinleo/swoft-aop-cacheable
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
