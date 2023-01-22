<?php
function mergeCategoriesHandler(){
  if(!is_admin()) return;
	setStep('chooseSourceCategoryToMerge');
	return Bot::sendMessage("Please choose SOURCE category you want to merge", ['reply_markup'=>Bot::keyboard(createStringfromArrayforMainMenuButton(getButtonArray()).getCancelString())]);
}
