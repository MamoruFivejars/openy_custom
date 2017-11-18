<?php

namespace Drupal\openy_campaign\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides form for managing module settings.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'openy_campaign_general_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['openy_campaign.general_settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('openy_campaign.general_settings');

    // Total amount of visitors taken from the CRM
    $form['total_amount_of_visitors'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Total amount of visitors'),
      '#default_value' => $config->get('total_amount_of_visitors'),
      '#description' => $this->t('Total amount of the visitors. 
      This value should be taken from the CRM. It is used for the analytics.'),
    ];

    // Login only messages
    $form['error_login_checkins_not_started'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Login Error Message: Campaign challenges have not yet started'),
      '#default_value' => $config->get('error_login_checkins_not_started')['value'],
      '#format' => $config->get('error_login_checkins_not_started')['format'],
      '#description' => $this->t('Message to display during login when member is already registered previously, 
        but the campaign challenges have not yet started. <br>
        Example: Good news! Our records show you have already registered.
        If you think this is a mistake, please contact our customer service center at 612-230-9622.'),
    ];
    $form['error_login_not_registered'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Login Error Message: Member is not registered'),
      '#default_value' => $config->get('error_login_not_registered')['value'],
      '#format' => $config->get('error_login_not_registered')['format'],
      '#description' => $this->t('Message to display during login if the member is not registered previously.<br>
        Example: Member with this member ID is not registered. Please register.'),
    ];
    $form['successful_login'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Login successful message'),
      '#default_value' => $config->get('successful_login')['value'],
      '#format' => $config->get('successful_login')['format'],
      '#description' => $this->t('Message to display after successful sign in.<br>
        Example: Thank you for logging in!'),
    ];

    // Registration only messages
    $form['error_register_checkins_not_started'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Registration Error Message: Campaign challenges have not yet started'),
      '#default_value' => $config->get('error_register_checkins_not_started')['value'],
      '#format' => $config->get('error_register_checkins_not_started')['format'],
      '#description' => $this->t('Message to display during registration for just 
        registered member if campaign is not started yet.<br>
        Example: You\'re already signed up! You can check your progress or report activities by signing in here.'),
    ];
    $form['error_register_already_registered'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Registration Error Message: Member is already registered'),
      '#default_value' => $config->get('error_register_already_registered')['value'],
      '#format' => $config->get('error_register_already_registered')['format'],
      '#description' => $this->t('Message to display during registration 
        if the member is already registered previously.<br>
        Example: You\'re already signed up! You can check your progress or report activities by signing in here.'),
    ];
    $form['successful_registration'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Registration successful message'),
      '#default_value' => $config->get('successful_registration')['value'],
      '#format' => $config->get('successful_registration')['format'],
      '#description' => $this->t('Message to display after successful registration.<br>
        Example: Thank you for registering. Now you can sign in!'),
    ];

    // General messages
    $form['error_msg_membership_id'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Error Message: Incorrect Membership ID'),
      '#default_value' => $config->get('error_msg_membership_id')['value'],
      '#format' => $config->get('error_msg_membership_id')['format'],
      '#description' => $this->t('Message to display if user is trying to 
        register/login with an incorrect membership ID.<br>
        Example: Please check your member ID to ensure it has been entered correctly. 
        If you have entered your number correctly and it still is not working, please 
        contact our customer service center at 612-230-9622.'),
    ];
    $form['error_msg_member_is_inactive'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Error Message: Member is inactive'),
      '#default_value' => $config->get('error_msg_member_is_inactive')['value'],
      '#format' => $config->get('error_msg_member_is_inactive')['format'],
      '#description' => $this->t('Message to display if the member ID entered is inactive.<br>
        Example: Our records indicate the member ID entered is inactive. Please check your member ID and
        re-enter it, or contact the customer service center at 612-230-9622.'),
    ];
    $form['error_msg_target_audience_settings'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Error Message: Member is ineligible due to the Target Audience Setting'),
      '#default_value' => $config->get('error_msg_target_audience_settings')['value'],
      '#format' => $config->get('error_msg_target_audience_settings')['format'],
      '#description' => $this->t('Message to display if member is ineligible due to the Target Audience Setting.<br>
        Example: We\'re sorry, but you are not eligible to participate in this promotion. 
        Please check the rules page for details. If you have any questions, please 
        contact our customer service center at 612-230-9622.'),
    ];
    $form['error_msg_default'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Error Message: Default message'),
      '#default_value' => $config->get('error_msg_default')['value'],
      '#format' => $config->get('error_msg_default')['format'],
      '#description' => $this->t('Message to display in all other cases.<br>
        Example: Something went wrong. Please contact our customer service center at 612-230-9622.'),
    ];

    $form['register_form_text'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Register form: Member ID text'),
      '#default_value' => $config->get('register_form_text')['value'],
      '#format' => $config->get('register_form_text')['format'],
      '#description' => $this->t('"Where can I find my Member ID?" link text.'),
    ];

    // Tracking Activity page messages
    $form['track_activity_my_visits'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Track Activity page: My Visits block text'),
      '#default_value' => $config->get('track_activity_my_visits')['value'],
      '#format' => $config->get('track_activity_my_visits')['format'],
      '#description' => $this->t('Track Activity page: Text into My Visits block. Use "[campaign:goal]" placeholder to show the goal number.'),
    ];

    $form['track_activity_game_no_games'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Track Activity page: The Game - No games available'),
      '#default_value' => $config->get('track_activity_game_no_games')['value'],
      '#format' => $config->get('track_activity_game_no_games')['format'],
      '#description' => $this->t('Track Activity page: The Game block. "No games available" message.'),
    ];

    $form['track_activity_game_games_remaining_one'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Track Activity page: The Game - One Game Remaining text'),
      '#default_value' => $config->get('track_activity_game_games_remaining_one')['value'],
      '#format' => $config->get('track_activity_game_games_remaining_one')['format'],
      '#description' => $this->t('Track Activity page: The Game block. "One Game Remaining" message.'),
    ];

    $form['track_activity_game_games_remaining_multiple'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Track Activity page: The Game - Multiple Game Remaining text'),
      '#default_value' => $config->get('track_activity_game_games_remaining_multiple')['value'],
      '#format' => $config->get('track_activity_game_games_remaining_multiple')['format'],
      '#description' => $this->t('Track Activity page: The Game block. "Multiple Game Remaining" message. Use "@count" placeholder for the number of remaining games.'),
    ];

    $form['instant_game_loose_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Game Loose message title'),
      '#default_value' => $config->get('instant_game_loose_title'),
      '#description' => $this->t('Title shown on loose card. F.x. "Sorry not this time".'),
    ];

    // Instant Game messages.
    for ($i = 1; $i <= 5; $i++) {
      $form['instant_game_loose_message_' . $i] = [
        '#type' => 'text_format',
        '#title' => $this->t('Instant-win Game page: Loose message ' . $i),
        '#default_value' => $config->get('instant_game_loose_message_' . $i)['value'],
        '#format' => $config->get('instant_game_loose_message_' . $i)['format'],
        '#description' => $this->t('Instant-win Game page: Loose message ' . $i . '. You can use "[campaign:title]" placeholder for the campaign name.'),
      ];
    }

    $form['instant_game_win_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Game Win message title'),
      '#default_value' => $config->get('instant_game_win_title'),
      '#description' => $this->t('Title shown on win card. F.x. "Congratulations".'),
    ];

    for ($i = 1; $i <= 5; $i++) {
      $form['instant_game_win_message_' . $i] = [
        '#type' => 'text_format',
        '#title' => $this->t('Instant-win Game page: Win message ' . $i),
        '#default_value' => $config->get('instant_game_win_message_' . $i)['value'],
        '#format' => $config->get('instant_game_win_message_' . $i)['format'],
        '#description' => $this->t('Instant-win Game page: Win message ' . $i . '. Use "[game:result]" as a placeholder for the gift name.'),
      ];
    }

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('openy_campaign.general_settings');
    // Total amount of visitors taken from the CRM
    $config->set('total_amount_of_visitors', (int)$form_state->getValue('total_amount_of_visitors'));
    // Login only messages
    $config->set('error_login_checkins_not_started', $form_state->getValue('error_login_checkins_not_started'));
    $config->set('error_login_not_registered', $form_state->getValue('error_login_not_registered'));
    $config->set('successful_login', $form_state->getValue('successful_login'));
    // Registration only messages
    $config->set('error_register_checkins_not_started', $form_state->getValue('error_register_checkins_not_started'));
    $config->set('error_register_already_registered', $form_state->getValue('error_register_already_registered'));
    $config->set('successful_registration', $form_state->getValue('successful_registration'));
    // General messages
    $config->set('error_msg_membership_id', $form_state->getValue('error_msg_membership_id'));
    $config->set('error_msg_member_is_inactive', $form_state->getValue('error_msg_member_is_inactive'));
    $config->set('error_msg_target_audience_settings', $form_state->getValue('error_msg_target_audience_settings'));
    $config->set('error_msg_default', $form_state->getValue('error_msg_default'));
    $config->set('register_form_text', $form_state->getValue('register_form_text'));
    // Tracking Activity page messages
    $config->set('track_activity_my_visits', $form_state->getValue('track_activity_my_visits'));
    $config->set('track_activity_game_no_games', $form_state->getValue('track_activity_game_no_games'));
    $config->set('track_activity_game_games_remaining_one', $form_state->getValue('track_activity_game_games_remaining_one'));
    $config->set('track_activity_game_games_remaining_multiple', $form_state->getValue('track_activity_game_games_remaining_multiple'));

    // Instant Game messages.
    for ($i = 1; $i <= 5; $i++) {
      $config->set('instant_game_loose_message_' . $i, $form_state->getValue('instant_game_loose_message_' . $i));
      $config->set('instant_game_win_message_' . $i, $form_state->getValue('instant_game_win_message_' . $i));
    }
    $config->set('instant_game_loose_title', $form_state->getValue('instant_game_loose_title'));
    $config->set('instant_game_win_title', $form_state->getValue('instant_game_win_title'));

    $config->save();

    parent::submitForm($form, $form_state);
  }

}
