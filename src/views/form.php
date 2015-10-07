<h2>What's your question?</h2>

<form class="ask" action="<?=$actionURL?>" onsubmit="return false || validate(this)" method="post">
<input type="text" name="name" placeholder="Name" value="<?=isset($question['name'])?$question['name']:""?>">
<input type="text" data-type="email" name="email" placeholder="Email" value="<?=isset($question['email'])?$question['email']:""?>">
<input type="text" name="topic" placeholder="Question Topic" value="<?=isset($question['topic'])?$question['topic']:""?>">
<textarea name="content" placeholder="Content" rows="8"><?=isset($question['content'])?$question['content']:""?></textarea>
<input type="submit" name="action" value="<?=$action?>">
</form>