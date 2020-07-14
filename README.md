# Laravel-User-Blocking
Modify __LoginController__ to allow or block user login attempt in cases where a user has:

  -Violated regulation rules.
  
  -Any other reason(s) that might call for user account blocking.

__Note://__ A new column on the login table must be added to specify the int to check for blocked and/or unblocked accounts.
