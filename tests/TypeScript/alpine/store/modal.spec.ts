import store from '@/alpine/store/modal'

describe('Testing the color picker store', () => {
  beforeEach(() => {
    store.current = null
    store.actives = []
  })

  it('should set the current modal id', () => {
    store.setCurrent('test')
    expect(store.current).toBe('test')

    store.setCurrent('test2')
    expect(store.current).toBe('test2')
  })

  it('should add the modal id to actives array after setting as current', () => {
    store.setCurrent('test')
    expect(store.current).toBe('test')

    store.setCurrent('test2')
    expect(store.current).toBe('test2')

    expect(store.actives).toIncludeAllMembers(['test', 'test2'])
  })

  it('should check if an id is the current', () => {
    store.setCurrent('test')
    expect(store.isCurrent('test')).toBeTrue()
    expect(store.isCurrent('test2')).toBeFalse()
  })

  it('should remove a modal id', () => {
    store.setCurrent('test')
    store.remove('test')
    expect(store.current).toBeNull()
    expect(store.actives).toBeEmpty()
  })

  it('should remove a modal id and not reset the current id', () => {
    store.setCurrent('test')
    store.setCurrent('test2')
    store.remove('test')
    expect(store.current).toBe('test2')
    expect(store.actives).toContain('test2')
  })
})
