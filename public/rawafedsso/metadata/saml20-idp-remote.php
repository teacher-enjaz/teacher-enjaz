<?php

/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */

$metadata['https://ssoidp.gov.ps/sso/saml2/idp/metadata.php'] = array (
  'metadata-set' => 'saml20-idp-remote',
  'entityid' => 'https://ssoidp.gov.ps/sso/saml2/idp/metadata.php',
  'SingleSignOnService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://ssoidp.gov.ps/sso/saml2/idp/SSOService.php',
    ),
  ),
  'SingleLogoutService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://ssoidp.gov.ps/sso/saml2/idp/SingleLogoutService.php',
    ),
  ),
  'certData' => 'MIIEPzCCAyegAwIBAgIJAIJxFAvkIoxeMA0GCSqGSIb3DQEBBQUAMHIxCzAJBgNVBAYTAnBzMQ0wCwYDVQQIEwRHYXphMQ0wCwYDVQQHEwRHYXphMQ0wCwYDVQQKEwRNVElUMQswCQYDVQQLEwJJVDENMAsGA1UEAxMEbXRpdDEaMBgGCSqGSIb3DQEJARYLbXRpdEBnb3YucHMwHhcNMTIwNDI5MDgwMjIwWhcNMjIwNDI5MDgwMjIwWjByMQswCQYDVQQGEwJwczENMAsGA1UECBMER2F6YTENMAsGA1UEBxMER2F6YTENMAsGA1UEChMETVRJVDELMAkGA1UECxMCSVQxDTALBgNVBAMTBG10aXQxGjAYBgkqhkiG9w0BCQEWC210aXRAZ292LnBzMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAsJmgJb/Y5sj4pXvDaUEMa6gMdPThVmn5yU7AFBxq4h920qByqhQJuFCrc9KheRADEZrcy2OkYrIoF4M03OAoqandhxWzAkEgq+gdmnNybxJcZjZDOEpW8gDxf672GCY4DUpRl7JmVzbIoY29mpK4dnf4h+8ojUZizmSu/F/Cz3EBDRDBjgqcU8bpV+SnkWQ71Z8/Z5djwqbNkaHXFzrQy5qI6t65yPpyGEyU6RoUIbeB3Ui1eumlyoBOu6Nn+/Nv90JX53QSqcxvnHoEHTqY3yLhIfdxnLrumUkmRWowmMbnSgrhxtrL1m3U93A/NrRjgDTCUoR2oxBYgbwMq5RVeQIDAQABo4HXMIHUMB0GA1UdDgQWBBSR9AfAWj+hBHiD68FoCArKOSi9kzCBpAYDVR0jBIGcMIGZgBSR9AfAWj+hBHiD68FoCArKOSi9k6F2pHQwcjELMAkGA1UEBhMCcHMxDTALBgNVBAgTBEdhemExDTALBgNVBAcTBEdhemExDTALBgNVBAoTBE1USVQxCzAJBgNVBAsTAklUMQ0wCwYDVQQDEwRtdGl0MRowGAYJKoZIhvcNAQkBFgttdGl0QGdvdi5wc4IJAIJxFAvkIoxeMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEFBQADggEBAIx1VwIRLk7Tj68xnVJpDAulAgdjduY5GylfMnPFSCMug6Oh16vCiMXFGldOzAZORI99KrcSe/UdlJyzu/OY3TzZgc/CSFmIgpkEB9OdahRH1qirH5ZbCqzw6ukxnjnWGxc7zCVZ3a2ZGK3PpJewhZmtjBcCaof3zfFvL+uislWZ5mO73wC8s2upJckQbB3eUXdO3N1EMgS1tQbZ85wwtnbFsEJCgKK9nGWHCO6pSmwFo80LzhTosg2htechCfSStMPLpMAiPRpyprV6g7PzRKl6lpghHJOS/XMMxmQbwMufy2JSRSMYFVeHx8RglCIIXPe4ucHvun3JZDqxwUO5pKo=',
  'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
  'contacts' => 
  array (
    0 => 
    array (
      'emailAddress' => 'sdadah@gov.ps',
      'contactType' => 'technical',
      'givenName' => 'Samer R. Eldadah',
    ),
  ),
);