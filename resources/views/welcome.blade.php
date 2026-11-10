<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <button type="button" class="btn-solid theme-primary" data-bs-toggle="dialog" data-bs-target="#exampleDialog">
  Open dialog
</button>

<dialog class="dialog" id="exampleDialog">
  <div class="dialog-header">
    <h1 class="dialog-title">Dialog title</h1>
    <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
  </div>
  <div class="dialog-body">
    <p>This is a native dialog element. It uses the browser’s built-in modal behavior for accessibility and focus management.</p>
  </div>
  <div class="dialog-footer">
    <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
    <button type="button" class="btn-solid theme-primary">Save changes</button>
  </div>
</dialog>

<button type="button" class="btn-solid theme-primary" id="liveToastBtn">Show live toast</button>


</body>
</html>~