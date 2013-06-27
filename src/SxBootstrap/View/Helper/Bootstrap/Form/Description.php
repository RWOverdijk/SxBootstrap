<?php
/**
 * SxBootstrap
 *
 * @category   SxBootstrap
 * @package    SxBootstrap_View
 * @subpackage View
 */

namespace SxBootstrap\View\Helper\Bootstrap\Form;

use SxBootstrap\View\Helper\Bootstrap\AbstractElementHelper;
use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\AbstractHelper;

/**
 * Form Description
 *
 * @category   SxBootstrap
 * @package    SxBootstrap_View
 * @subpackage View
 */
class Description extends AbstractElementHelper
{
    /**
     * @var string wrapper for displaying block help
     */
    protected $blockWrapper = '<p class="help-block">%s</p>';

    /**
     * @var string wrapper for displaying inline help
     */
    protected $inlineWrapper = '<span class="help-inline">%s</span>';

    /**
     * Magical Invoke Method
     *
     * @param  ElementInterface       $elemnet
     * @param  string                 $blockWrapper
     * @param  string                 $invokeWrapper
     * @return string|FormDescription
     */
    public function __invoke(ElementInterface $element = null, $blockWrapper = null, $inlineWrapper = null)
    {
        if ($element) {
            return $this->render($element, $blockWrapper, $inlineWrapper);
        }

        return $this;
    }

    /**
     * Render
     *
     * @param  ElementInterface $elmenet
     * @param  string           $blockWrapper
     * @param  string           $inlineWrapper
     * @return string
     */
    public function render(ElementInterface $element, $blockWrapper = null, $inlineWrapper = null)
    {
        $blockWrapper   = $blockWrapper ?: $this->blockWrapper;
        $inlineWrapper  = $inlineWrapper ?: $this->inlineWrapper;
        $html           = '';

        if (($inline = $element->getOption('help-inline'))) {
            $html .= sprintf($inlineWrapper, $inline);
        }
        if (($block = $element->getOption('help-block'))) {
            $html .= sprintf($blockWrapper, $block);
        }

        return $html;
    }

    /**
     * Set Block Wrapper
     *
     * @param  string          $blockWrapper
     * @return FormDescription
     */
    public function setBlockWrapper($blockWrapper)
    {
        $this->blockWrapper = (string) $blockWrapper;

        return $this;
    }

    /**
     * Get Block Wrapper
     *
     * @return string
     */
    public function getBlockWrapper()
    {
        return $this->blockWrapper;
    }

    /**
     * Set Inline wrapper
     *
     * @param  string          $inlineWrapper
     * @return FormDescription
     */
    public function setInlineWrapper($inlineWrapper)
    {
        $this->inlineWrapper = (string) $inlineWrapper;

        return $this;
    }

    /**
     * Get Inline Wrapper
     *
     * @return string
     */
    public function getInlineWrapper()
    {
        return $this->inlineWrapper;
    }
}
