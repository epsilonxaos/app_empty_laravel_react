import { useMotionValue, useSpring } from 'framer-motion'

import { useEffect, useRef, useState } from 'react'

export default function GtCounter({ value = 0 }) {
	const ref = useRef(null)
	const [number, setNumber] = useState(0)
	const [direction, setDirection] = useState('up')
	const motionValue = useMotionValue(0)
	const springValue = useSpring(motionValue, {
		damping: 500,
		stiffness: 200,
	})

	useEffect(() => {
		motionValue.set(value)
	}, [value])

	useEffect(
		() =>
			springValue.on('change', latest => {
				if (ref.current) {
					ref.current.textContent = Intl.NumberFormat('en-US').format(latest.toFixed(0))
				}
			}),
		[springValue]
	)

	return (
		<span
			className='text-xl dark:text-default-200'
			ref={ref}
		/>
	)
}
