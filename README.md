## 1.预警组件

基于 shershon/common包 封装的预警组件，可以根据设定的日志级别，实时地触发报警（已支持 企信通知、短信通知、钉钉通知 等）。

## 2.安装

- 配置composer.json
```json
{
  "require-dev": {
    "shershon/base": "^1.0.0"
  },
  "config": {
    "secure-http": false
  },
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/shershon-php-package/alarm-component.git"
    }
  ]
}
```

- composer require --ignore-platform-reqs shershon/alarm
- rm -rf vendor/shershon/alarm/.git

## 3.更新包版本
- composer require --ignore-platform-reqs shershon/alarm:1.0.0(替换成指定的版本)
- rm -rf vendor/shershon/alarm/.git