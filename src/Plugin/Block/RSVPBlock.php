<?php
/**
 * @file
 * Contains \Drupal\rsvplist_tool\Plugin\Block\RSVPBlock
 */
 namespace Drupal\rsvplist_tool\Plugin\Block;
 
 use Drupal\Core\Block\BlockBase;
 use Drupal\Core\Session\AccountInterface;
 use Drupal\Core\Access\AccessResult;


 /**
 * Provides a 'RSVP' List Block
 *
 * @Block(
 *   id = "rsvp_block",
 *   admin_label = @Translation("RSVP Block"),
 *   category = @Translation("Blocks")
 * )
 */
class RSVPBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return \Drupal::formBuilder()->getForm('Drupal\rsvplist_tool\Form\RSVPForm');
    }

  /**
   * {@inheritdoc}
   */
  public function blockAccess(AccountInterface $account) {
    /** @var \Drupal\node\Entity\Node $node */
    $node = \Drupal::routeMatch()->getParameter('node');
    $nid = $node->nid->value;
    /** @var \Drupal\rsvplist_tool\EnablerService $enabler */
    $enabler = \Drupal::service('rsvplist_tool.enabler');
    if(is_numeric($nid)) {
      if($enabler->isEnabled($node)) {
        return AccessResult::allowedIfHasPermission($account, 'view rsvplist_tool');
      }
    }
    return AccessResult::forbidden();
  }
  
}

