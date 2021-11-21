<?php
/**
 * 手机号
 * @author yupoxiong<i@yufuping.com>
 */

namespace generate\field;

class Mobile extends Field
{
    public static string $html = <<<EOF
<div class="form-group row">
    <label for="[FIELD_NAME]" class="col-sm-2 control-label">[FORM_NAME]</label>
    <div class="col-sm-10 col-md-4 formInputDiv">
        <input id="[FIELD_NAME]" name="[FIELD_NAME]" value="{\$data.[FIELD_NAME]|default='[FIELD_DEFAULT]'}" placeholder="请输入[FORM_NAME]" type="tel" maxlength="11" class="form-control fieldMobile">
    </div>
</div>\n
EOF;

    public static array $rules = [
        'required' => '非空',
        'mobile'   => '手机号',
    ];

    public static function create($data): string
    {
        return str_replace(array('[FORM_NAME]', '[FIELD_NAME]', '[FIELD_DEFAULT]'), array($data['form_name'], $data['field_name'], $data['field_default']), self::$html);
    }
}