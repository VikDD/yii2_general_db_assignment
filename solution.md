# yii2_general_db_assignment solution

> 1) Используя Yii2 необходимо реализовать форму регистрации пользователя с условием типа физ./юр. лицо. Для физ. лица необходимо заполнить: почту, ФИО и в случае ИП - ИНН, а для юр. лица: почту, ФИО, название организации и инн. Внешний вид значения не имеет.

[phys./jur. person regform test app](https://github.com/superflanker35/yii2_general_db_assignment/tree/master/formstest)

> 2) Реализовать кеширование для функции:

```$php
function($date, $type) {
	$userId = Yii::$app->user->id;
	$dataList = SomeDataModel::find()->where(['date' => $date, 'type' => $type, 'user_id' => $userId])->all();
	$result = [];
	if (!empty($dataList)) {
		foreach ($dataList as $dataItem) {
			$result[$dataItem->id] = ['a' => $dataItem->a, 'b' => $dataItem->b];
		}
	}
	return $result;
}
```

Кэширование данных

```$php
function($date, $type) {
	$userId = Yii::$app->user->id;

	$cacheKey = 'somedata_date_'.$date.'_type_'.$type.'_uid_'.$userId;
	
	$result = Yii::$app->cache->getOrSet($cacheKey, function () {

    	$dataList = SomeDataModel::find()->where(['date' => $date, 'type' => $type, 'user_id' => $userId])->all();
		$result = [];
     
        	if (!empty($dataList)) {
            		foreach ($dataList as $dataItem) {
                		$result[$dataItem->id] = ['a' => $dataItem->a, 'b' => $dataItem->b];
            		}
        	}

		return $result;
        
	});

	return $result;
}
```

Кэширование запросов

Первый вариант
```$php
function($date, $type) {
	$userId = Yii::$app->user->id;
	$dataList = SomeDataModel::find()->where(['date' => $date, 'type' => $type, 'user_id' => $userId])->cache(120)->all();

	$result = [];
	if (!empty($dataList)) {
		foreach ($dataList as $dataItem) {
			$result[$dataItem->id] = ['a' => $dataItem->a, 'b' => $dataItem->b];
		}
	}
	return $result;
}
```

Второй вариант
```$php
function($date, $type) {
	$userId = Yii::$app->user->id;
	$dataList = SomeDataModel::getDb()->cache(function ($db) use ($date, $type, $userId) {
		return SomeDataModel::find()->where(['date' => $date, 'type' => $type, 'user_id' => $userId])->all();
	});

	$result = [];
	if (!empty($dataList)) {
		foreach ($dataList as $dataItem) {
			$result[$dataItem->id] = ['a' => $dataItem->a, 'b' => $dataItem->b];
		}
	}
	return $result;
}
```

> 3) Схематично описать структуру таблиц для хранения информации о медикаментах со следующими требованиями: лекарство имеет название, срок годности и список болезней, при которых это лекарство можно применять.

- таблица лекарств: medications
    - id - ID ( id(INT 11) UNSIGNED PRIMARY KEY AUTO_INCREMENT )
    - name - Название лекарства ( name(VARCHAR 512) NOT NULL utf8_general_ci )
    - expiry_date - Дата окончания срока годности ( expiry_date(datetime) NOT NULL )
- таблица болезней: diseases
    - id - ID ( id(INT 11) UNSIGNED PRIMARY KEY AUTO_INCREMENT )
    - name - Название болезни ( name(VARCHAR 512) NOT NULL utf8_general_ci )
- таблица связей медикаментов и болезней: medications_diseases
    - medication_id - ID медикамента из таблицы лекарств medications ( medication_id(INT 11) UNSIGNED )
    - disease_id - ID болезни из таблицы болезней diseases ( disease_id(INT 11) UNSIGNED )

> 4) Перед отображением содержимого любой запрошенной страницы необходимо выполнять определенную последовательность действий со стороны backend(например проверка поля в бд). Как это лучше реализовать?

В приложении необходимо создать единую точку валидации данных перед парсингом. Реализовать это можно при помощи функции, принимающей на вход данные и тип валидации. Вызов этой функции нужно осуществлять перед передачей данных шаблонизатору.