# Schema for the configuration file of rsvplist_tool module.

rsvplist_tool.settings:
  type: config_object
  label: 'RSVP List Content Type Settings'
  mapping:
    allowed_types:
      type: sequence
      label: 'Content types RSVP Form can display on'
      sequence:
        type: string
        label: 'Content type'
     