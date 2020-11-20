<?php
/* rajouter static après public lors des méthodes ou des propriétés, permet de les utiliser sans
// devoir les instancier au préalable.
par exemple:
SANS STATIC ON FERAIT : $form = new Form(); (ceci est l'instanciation)
                        echo $form->checkbox('demo', 'Demo', []);

AVEC STATIC ON FAIT : echo Form::checkbox('demo', 'Demo', []);
Pour la propriété on ferait par exemple echo Form::$class; si on fait appelle à elle depuis l'exterieur de la class
par contre si on fait appelle à une propriété dans la class, on utilise alors le mot self
*/
class Form {

    public static $class = "form-control";

    public static function checkbox (string $name, string $value = null, array $data = []): string
    {
        $attributes = '';
        if (isset($data[$name]) && in_array($value, $data[$name])) {
            $attributes .= 'checked';
        }
        $attributes = ' class="' . self::$class . '"';
        return <<<HTML
        <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
    }

    public static function radio (string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && $value === $data[$name]) {
        $attributes .= 'checked';
    }
    return <<<HTML
    <input type="radio" name="{$name}" value="$value" $attributes>
HTML;
}

    public static function select (string $name, $value, array $options): string
    {
        $html_options = [];
        foreach ($options as $k => $option) {
            $attributes = $k == $value ? ' selected' : '';
            $html_options[] = "<option value='$k' $attributes>$option</option>";
        }
        return "<select class='form-control' name='$name'> " . implode($html_options) . '</select>';
    }
}