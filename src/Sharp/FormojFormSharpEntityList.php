<?php

namespace Code16\Formoj\Sharp;

use Code16\Formoj\Models\Form;
use Code16\Sharp\EntityList\Containers\EntityListDataContainer;
use Code16\Sharp\EntityList\EntityListQueryParams;
use Code16\Sharp\EntityList\SharpEntityList;

class FormojFormSharpEntityList extends SharpEntityList
{

    function buildListDataContainers(): void
    {
        $this
            ->addDataContainer(
                EntityListDataContainer::make("ref")
                    ->setLabel(trans("formoj::sharp.forms.list.columns.ref_label"))
            )
            ->addDataContainer(
                EntityListDataContainer::make("title")
                    ->setLabel(trans("formoj::sharp.forms.list.columns.title_label"))
            )
            ->addDataContainer(
                EntityListDataContainer::make("description")
                    ->setLabel(trans("formoj::sharp.forms.list.columns.description_label"))
            )
            ->addDataContainer(
                EntityListDataContainer::make("published_at")
                    ->setLabel(trans("formoj::sharp.forms.list.columns.published_at_label"))
            )
            ->addDataContainer(
                EntityListDataContainer::make("sections")
                    ->setLabel(trans("formoj::sharp.forms.list.columns.sections_label"))
            );
    }

    function buildListLayout(): void
    {
        $this
            ->addColumn("ref", 1)
            ->addColumn("title", 3, 5)
            ->addColumnLarge("description", 3)
            ->addColumn("published_at", 2, 6)
            ->addColumnLarge("sections", 3);
    }

    function buildListConfig(): void
    {
    }

    function getListData(EntityListQueryParams $params)
    {
        return $this
            ->setCustomTransformer("ref", function($value, $instance) {
                return "<strong>#{$instance->id}</strong>";
            })
            ->setCustomTransformer("title", function($value, $instance) {
                return $instance->title ?: "<em>" . trans("formoj::sharp.forms.no_title") . "</em>";
            })
            ->setCustomTransformer("published_at", function($value, $instance) {
                return static::publicationDates($instance);
            })
            ->setCustomTransformer("sections", function($value, $instance) {
                return $instance->sections->pluck("title")->implode("<br>");
            })
            ->transform(Form::with("sections")->get());
    }

    /**
     * @param string|null $value
     * @return array|string|null
     */
    public static function notificationStrategies(?string $value = null)
    {
        $types = [
            Form::NOTIFICATION_STRATEGY_NONE => trans("formoj::sharp.forms.notification_strategies." . Form::NOTIFICATION_STRATEGY_NONE),
            Form::NOTIFICATION_STRATEGY_GROUPED => trans("formoj::sharp.forms.notification_strategies." . Form::NOTIFICATION_STRATEGY_GROUPED),
            Form::NOTIFICATION_STRATEGY_EVERY => trans("formoj::sharp.forms.notification_strategies." . Form::NOTIFICATION_STRATEGY_EVERY),
        ];

        return $value ? ($types[$value] ?? null) : $types;
    }

    public static function publicationDates(Form $form): string
    {
        if($form->published_at) {
            if($form->unpublished_at) {
                return sprintf(
                    trans("formoj::sharp.forms.list.data.dates.both"),
                    $form->published_at->isoFormat("LLL"),
                    $form->unpublished_at->isoFormat("LLL")
                );
            }
            return sprintf(
                trans("formoj::sharp.forms.list.data.dates.from"),
                $form->published_at->isoFormat("LLL")
            );
        }

        if($form->unpublished_at) {
            return sprintf(
                trans("formoj::sharp.forms.list.data.dates.to"),
                $form->unpublished_at->isoFormat("LLL")
            );
        }

        return "";
    }
}