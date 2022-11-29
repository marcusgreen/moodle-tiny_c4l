<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace tiny_c4l;

use context;
use editor_tiny\plugin;
use editor_tiny\plugin_with_buttons;
use editor_tiny\plugin_with_configuration;
use editor_tiny\plugin_with_menuitems;

/**
 * Tiny c4l plugin for Moodle.
 *
 * @package    tiny_c4l
 * @copyright  2022 Marc Català <reskit@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class plugininfo extends plugin implements
    plugin_with_buttons,
    plugin_with_menuitems,
    plugin_with_configuration {

    public static function get_available_buttons(): array {
        return [
            'tiny_c4l/c4l',
        ];
    }

    public static function get_available_menuitems(): array {
        return [
            'tiny_c4l/c4l',
        ];
    }

    public static function get_plugin_configuration_for_context(
        context $context,
        array $options,
        array $fpoptions,
        ?\editor_tiny\editor $editor = null
    ): array {
        $viewc4l = has_capability('tiny/c4l:viewplugin', $context);
        $showpreview = get_config('tiny_c4l', 'enablepreview');

        return [
            'showpreview' => ($showpreview == '1'),
            'viewc4l' => $viewc4l,
        ];
    }
}
