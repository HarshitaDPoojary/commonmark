<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (http://bitly.com/commonmarkjs)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Block\Renderer;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\BlockQuote;
use League\CommonMark\HtmlRenderer;

class BlockQuoteRenderer implements BlockRendererInterface
{
    /**
     * @param BlockQuote $block
     * @param HtmlRenderer $htmlRenderer
     * @param bool $inTightList
     *
     * @return string
     */
    public function render(AbstractBlock $block, HtmlRenderer $htmlRenderer, $inTightList = false)
    {
        $filling = $htmlRenderer->renderBlocks($block->getChildren());
        if ($filling === '') {
            return $htmlRenderer->inTags('blockquote', array(), $htmlRenderer->getOption('innerSeparator'));
        } else {
            return $htmlRenderer->inTags(
                'blockquote',
                array(),
                $htmlRenderer->getOption('innerSeparator') . $filling . $htmlRenderer->getOption('innerSeparator')
            );
        }
    }
}