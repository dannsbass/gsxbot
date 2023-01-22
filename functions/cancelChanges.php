<?php

function cancelChanges(){
  backHandler();
  foreach([
  'ready_to_change',
  'change_price',
  'editor_is',
  'newCategory',
  'newService',
  'newUserPrice',
  'newVipMemberPrice',
  'categoryToChangePrice',
  'serviceToChangePrice',
  'memberTypeToChangePrice',
  'categoryToRemoveService',
  'sourceCategoryToMerge',
  ] as $field) db::del($field.fromid());
  clearStep();
}