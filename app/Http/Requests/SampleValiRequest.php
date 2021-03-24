<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleValiRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
      return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
      return [
        'name' => 'required|string|max:255',
        'gender' => 'required',
        'age' => 'required|integer',
        'file' => 'required|file|image|max:10000',
        'comment' => 'required',
      ];
  }

  /**
   * エラーメッセージのカスタマイズ
   * @return array
   */
  public function messages()
  {
    return [
      'name.required' => '名前を入力してください',
      'name.string' => '名前は文字列で入力してください',
      'name.max' => '名前は255文字以内で入力してください',
      'gender.required'  => '性別を選択してください',
      'age.required'  => '年齢を選択してください',
      'age.integer'  => '年齢は数字で入力してください',
      'file.required'  => 'ファイルを選択してください',
      'file.file'  => 'ファイルのアップロードに失敗しました',
      'file.image'  => 'アップロード可能な画像は「jpg」「png」「bmp」「gif」「svg」です',
      'file.max'  => 'アップロードするファイルは10MBまでです',
      'comment.required' => 'コメントを入力してください',
    ];
  }

  /**
   * 独自処理を追加する
   * @param $validator
   */
  public function withValidator($validator)
  {
    $validator->after(function ($validator) {
      if (
        strtotime(date('H:i:s')) >= strtotime('21:00:00')
        ||
        strtotime(date('H:i:s')) <= strtotime('09:00:00')
      ) {
        $validator->errors()->add('field', '投稿できるのは９時から２１時までです。');
      }
    });
  }
}