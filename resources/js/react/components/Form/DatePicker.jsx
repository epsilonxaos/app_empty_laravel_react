// - General
import getMonth from 'date-fns/getMonth'
import getYear from 'date-fns/getYear'
import es from 'date-fns/locale/es'
import { range } from 'lodash'
import { DateTime } from 'luxon'

import { forwardRef } from 'react'
import ReactDatePicker from 'react-datepicker'
import 'react-datepicker/dist/react-datepicker-cssmodules.css'
// - Style
import 'react-datepicker/dist/react-datepicker.css'
// - Icons
import { FaAngleLeft, FaAngleRight } from 'react-icons/fa'

import '../css/datepicker.css'

export default function DatePicker({
	handleChangeFn = () => {},
	value = '',
	label = '',
	inputRef = null,
	validationStyleError = null,
	validationMessageError = null,
}) {
	const currentYear = new Date().getFullYear()
	const yearMinus80 = currentYear - 80
	const years = range(yearMinus80, getYear(new Date()) + 1, 1)
	const months = [
		'Enero',
		'Febrero',
		'Marzo',
		'Abril',
		'Mayo',
		'Junio',
		'Julio',
		'Agosto',
		'Septiembre',
		'Octubre',
		'Noviembre',
		'Diciembre',
	]

	const styleError = {
		borderColor: '#EC008C #EC008C #EC008C rgb(236, 89, 144)',
		borderStyle: 'solid',
		borderWidth: '1px 1px 1px 8px',
		borderImage: 'none 100% / 1 / 0 stretch',
	}

	const handleChange = date => {
		const day = DateTime.fromJSDate(date)
		handleChangeFn(day.toFormat('yyyy-LL-dd', { locale: 'es-MX' }))
	}

	const CustomDatePickerButton = forwardRef(({ value, onClick }, ref) => (
		<input
			type='text'
			className='border-1 h-[32px] w-full cursor-pointer select-none appearance-none rounded border border-default-300 bg-white p-1.5 text-base text-default-900 transition-all focus:border-primary-500 focus:ring-1 focus:ring-primary-500 disabled:border-neutral-200 disabled:bg-neutral-100 dark:border-default-600 dark:bg-default-800 dark:text-white dark:placeholder-default-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 dark:disabled:border-gray-700 dark:disabled:bg-default-800 dark:disabled:opacity-60'
			onClick={onClick}
			{...(validationStyleError && { style: styleError })}
			ref={ref}
			value={value}
			readOnly
		/>
	))

	return (
		<>
			{label && <label className='text-paragraph pointer-events-none mb-1 block font-medium'>{label}</label>}
			<ReactDatePicker
				locale={es}
				renderCustomHeader={({
					date,
					changeYear,
					changeMonth,
					decreaseMonth,
					increaseMonth,
					prevMonthButtonDisabled,
					nextMonthButtonDisabled,
				}) => (
					<div className='flex justify-center'>
						<button
							type='button'
							className='p-0.5 px-2 text-primary-500 dark:text-primary-400'
							onClick={decreaseMonth}
							disabled={prevMonthButtonDisabled}>
							<FaAngleLeft />
						</button>
						<select
							className='border-1 appearance-none rounded border border-default-300 bg-white px-2 py-1 pr-6 text-base text-default-900 focus:border-primary-500 focus:ring-primary-500 disabled:border-neutral-200 disabled:bg-neutral-100 dark:border-default-600 dark:bg-default-800 dark:text-white dark:placeholder-default-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 dark:disabled:border-gray-700 dark:disabled:bg-default-800 dark:disabled:opacity-60'
							value={getYear(date)}
							onChange={({ target: { value } }) => changeYear(value)}>
							{years.map(option => (
								<option
									key={option}
									value={option}>
									{option}
								</option>
							))}
						</select>

						<select
							className='border-1 ml-2 appearance-none rounded border border-default-300 bg-white px-2 py-1 pr-6 text-base text-default-900 focus:border-primary-500 focus:ring-primary-500 disabled:border-neutral-200 disabled:bg-neutral-100 dark:border-default-600 dark:bg-default-800 dark:text-white dark:placeholder-default-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 dark:disabled:border-gray-700 dark:disabled:bg-default-800 dark:disabled:opacity-60'
							value={months[getMonth(date)]}
							onChange={({ target: { value } }) => changeMonth(months.indexOf(value))}>
							{months.map(option => (
								<option
									key={option}
									value={option}>
									{option}
								</option>
							))}
						</select>

						<button
							type='button'
							className='p-0.5 px-2 text-primary-500 dark:text-primary-400'
							onClick={increaseMonth}
							disabled={nextMonthButtonDisabled}>
							<FaAngleRight />
						</button>
					</div>
				)}
				customInput={<CustomDatePickerButton />}
				selected={!value ? '' : new Date(value + 'T00:00:00')}
				onChange={date => handleChange(date)}
			/>

			{validationMessageError && (
				<p className='small font-medium text-tertiary-600 dark:text-tertiary-400'>{validationMessageError}</p>
			)}
		</>
	)
}
