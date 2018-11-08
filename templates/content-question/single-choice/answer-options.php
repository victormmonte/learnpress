<?php
/**
 * Template for displaying answer options of single-choice question.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-question/single-choice/answer-options.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

/**
 * @var LP_Question               $question
 * @var LP_Question_Answers       $answers
 * @var LP_Question_Answer_Option $answer
 */
isset( $question ) or die( __( 'Invalid question!', 'learnpress' ) );

if ( ! $answers = $question->get_answers() ) {
	return;
}
$user = LP_Global::user();
$quiz = LP_Global::course_item_quiz();
$question->setup_data( $quiz->get_id() );
?>

<ul id="answer-options-<?php echo $question->get_id(); ?>" <?php $answers->answers_class(); ?>>

	<?php foreach ( $answers as $k => $answer ) { ?>

        <li <?php $answer->option_class(); ?>>

            <input type="radio" class="option-check" name="learn-press-question-<?php echo $question->get_id(); ?>"
                   value="<?php echo $answer->get_value(); ?>"
				<?php $answer->checked(); ?>
				<?php $answer->disabled(); ?> />
            <div class="option-title">
                <div class="option-title-content"><?php echo $answer->get_title( 'display' ); ?></div>
            </div>

			<?php do_action( 'learn_press_after_question_answer_text', $answer, $question ); ?>

        </li>

	<?php } ?>

</ul>