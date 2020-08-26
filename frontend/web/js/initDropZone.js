Dropzone.autoDiscover = false;
var dropzone = new Dropzone("div.create__file",
  {
    url: window.location.href,
    maxFiles: 10,
    uploadMultiple: true,
    previewTemplate: '<a href="#"><img data-dz-thumbnail alt="Прикреплённые файлы"></a>',
    paramName: 'CreateTaskForm[files]',
    autoProcessQueue: true
  });
