<?php

/*
 * Textpattern Content Management System
 * https://textpattern.com/
 *
 * Copyright (C) 2017 The Textpattern Development Team
 *
 * This file is part of Textpattern.
 *
 * Textpattern is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, version 2.
 *
 * Textpattern is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Textpattern. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * A bunch of tags combining an event, step and token.
 *
 * Replaces eInput(), sInput(), tInput().
 *
 * @since   4.7.0
 * @package Widget
 */

namespace Textpattern\Widget;

class AdminAction extends TextboxSet implements \Textpattern\Widget\WidgetCollectionInterface
{
    /**
     * Construct event/step/token widgets.
     * 
     * @param string      $event      The Textpattern event (panel)
     * @param string|true $stepOrCsrf The Textpattern step (action), or true if only event + token are required
     * @param boolean     $csrf       Whether to render a token
     */
    public function __construct($event, $stepOrCsrf = null, $csrf = false)
    {
        $nameVals['event'] = $event;

        if ($stepOrCsrf === true) {
            $csrf = true;
        } elseif ($stepOrCsrf) {
            $nameVals['step'] = $stepOrCsrf;
        }

        parent::__construct($nameVals, 'hidden');

        if ($csrf) {
            $token = new \Textpattern\Widget\Token();
            $this->addWidget($token, 'token');
        }
    }
}
