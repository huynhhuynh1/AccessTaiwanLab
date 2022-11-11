class CreateArticles < ActiveRecord::Migration[6.0]
  def change
    create_table :articles do |t|
      t.string :title
      t.text :content
      t.integer :author_id

      t.timestamps
    end
    add_reference :authors, :author_id, index: true
  end
end
