<?php

namespace Golf\Form;

use Laminas\Form\Fieldset;

class PostFieldset extends Fieldset
{
    public function init()
    {
        $this->add(
            [
                "type" => "text",
                "name" => "title",
                "options" => [
                    "label" => "First name",
                ],
            ]
        );

        $this->add(
            [
                "type" => "text",
                "name" => "title",
                "options" => [
                    "label" => "Last name",
                ],
            ]
        );

        $this->add(
            [
                "type" => "number",
                "name" => "text",
                "options" => [
                    "label" => "Handicap",
                ],
            ]
        );


    }
}